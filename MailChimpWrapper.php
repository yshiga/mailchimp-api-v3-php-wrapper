<?php
require("vendor/autoload.php");
use \DrewM\MailChimp\MailChimp;

/**
 * This class is wrapper of Mailchimp-api library by drewm
 * @see https://github.com/drewm/mailchimp-api, http://developer.mailchimp.com/
 */
class MailChimpWrapper {

  private $client;

  public function __construct($apiKey) {
    $this->client = new MailChimp($apiKey); 
  }

  public function createCampaign($targetListId, $title, $subject, $fromName, $replyTo){
    return $this->client->post('campaigns', array(
      'type' => 'regular',
      'recipients' => array( 
        'list_id' => $targetListId,
      ),
      'settings' => array(
        'title' => $title,
        'subject_line' => $subject,
        'from_name' => $fromName,
        'reply_to' => $replyTo,
      ),
      'tracking' => array( 
        'html_clicks' => true,
        'text_clicks' => true,
      )  
    ));
  }

  public function setMailBody($body, $id) {
    return $this->client->put('campaigns/' . $id . '/content', array(
      'html' => $body,
    ));
  }

  public function sendCampaign($id) {
    return $this->client->post('campaigns/' + $id + '/actions/send');
  }

  public function getAllList() {
    return $this->client->get('lists');
  }
}

