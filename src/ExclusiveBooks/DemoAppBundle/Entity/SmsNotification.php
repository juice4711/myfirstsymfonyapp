<?php
namespace ExclusiveBooks\DemoAppBundle\Entity;

class SmsNotification
{
    private $number;
    private $username;
    private $passphrase;
    private $smsText;
    private $sendstatus;
    private $mesgstatus;
    private $mesgid;
    private $env;

     public function __construct(array $smsarray)
    {
        $this->username = $smsarray['Username'];
        $this->passphrase = $smsarray['Password'];
        $this->number = $smsarray['numto'];

        if (array_key_exists("data1" , $smsarray)){$this->smsText = $smsarray['data1'];}
	if (array_key_exists("id" , $smsarray)){$this->mesgid = $smsarray['id'];}
	if (array_key_exists("env" , $smsarray))
		{ 
		if ($smsarray['env'] == "dev"){$this->env = "false";}
		else {$this->env = "true";}
		}
	if (array_key_exists("live" , $smsarray)){$this->env = $smsarray['live'];}

	$this->sendstatus = "N";
	$this->mesgstatus = "";
    }

    public function setSmsText($smsText)
    {
        $this->smsText = $smsText;
        return $this;
    }

    public function getSmsText()
    {
        return $this->smsText;
    }
    
    public function getRecipientNo()
    {
        return $this->number;
    }

   public function getMesgStatus()
    {
        return $this->sendstatus;
    }

   public function getMesgResult()
    {
        return $this->mesgstatus;
    }

   public function getId()
    {
        return $this->mesgid;
    }
    public function sendSmsNotification()
    {
	if ($this->number == ""){$this->mesgstatus='F';return "Message not sent - invalid recipient!";}
        //send actual SMS using smsportal http service
	$data= array(
                "Type"=> "sendparam",
                "Username" => $this->username,
                "Password" => $this->passphrase,
                "live" => $this->env,
                "numto" => $this->number,
                "data1" => $this->smsText,
) ; //This contains data that you will send to the server.
        $data = http_build_query($data); //builds the post string ready for posting
        $result = $this->do_post_request('http://www.mymobileapi.com/api5/http5.aspx', $data);  //Sends the post, and returns the result from the server.
        $this->mesgstatus = $result;
        if (strrpos($result, "True") === false) {$this->sendstatus="F"; return "SMS notification send failed!";} else {$this->sendstatus = "S"; return "SMS notification sent sucessfully";}
    }

   public function getQueueMsg($id)
    {
	$data= array("mesg"=> array(
                "Type"=> "sendparam",
		"id"=>$id,
                "Username" => $this->username,
                "Password" => $this->passphrase,
                "live" => $this->env,
                "numto" => $this->number,
                "data1" => $this->smsText,
) ); 
	return serialize($data);
    }


 private function do_post_request($url, $data, $optional_headers = null)
  {
     $params = array('http' => array(
                  'method' => 'POST',
                  'content' => $data
               ));
     if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
     }
     $ctx = stream_context_create($params);
     $fp = @fopen($url, 'rb', false, $ctx);
     if (!$fp) {
        throw new Exception("Problem with $url, $php_errormsg");
     }
     $response = @stream_get_contents($fp);
     if ($response === false) {
        throw new Exception("Problem reading data from $url, $php_errormsg");
     }
     $response;
     return $this->formatXmlString($response);

  }

	//takes the XML output from the server and makes it into a readable xml file layout
	//DO NOT EDIT unless you are sure of your changes
	private function formatXmlString($xml)
	{

	  // add marker linefeeds to aid the pretty-tokeniser (adds a linefeed between all tag-end boundaries)
	  $xml = preg_replace('/(>)(<)(\/*)/', "$1\n$2$3", $xml);

	  // now indent the tags
	  $token      = strtok($xml, "\n");
	  $result     = ''; // holds formatted version as it is built
	  $pad        = 0; // initial indent
	  $matches    = array(); // returns from preg_matches()

	  // scan each line and adjust indent based on opening/closing tags
	  while ($token !== false) :

	    // test for the various tag states

	    // 1. open and closing tags on same line - no change
	    if (preg_match('/.+<\/\w[^>]*>$/', $token, $matches)) :
	      $indent=0;
	    // 2. closing tag - outdent now
	    elseif (preg_match('/^<\/\w/', $token, $matches)) :
	      $pad--;
	    // 3. opening tag - don't pad this one, only subsequent tags
	    elseif (preg_match('/^<\w[^>]*[^\/]>.*$/', $token, $matches)) :
	      $indent=1;
	    // 4. no indentation needed
	    else :
	      $indent = 0;
	    endif;

	    // pad the line with the required number of leading spaces
	    $line    = str_pad($token, strlen($token)+$pad, ' ', STR_PAD_LEFT);
	    $result .= $line . "\n"; // add to the cumulative result, with linefeed
	    $token   = strtok("\n"); // get the next token
	    $pad    += $indent; // update the pad size for subsequent lines
	    $pad    += $indent; // update the pad size for subsequent lines
	  endwhile;

	  return $result;
	}


}
