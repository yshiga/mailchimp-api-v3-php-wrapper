# mailchimp-api-v3-php-wrapper
This is simple wrapper for drewm/mailchimp-api https://github.com/drewm/mailchimp-api

please follow instruction of drewm/mailchimp-api instruction

# install drewm/mailchimp-api
```
$ composer require drewm/mailchimp-api
```
to know more about installation, please follow instruction of drewm/mailchimp-api instruction

# how to use
```
require_once("MailChimpWrapper/MailChimpWrapper.php");
$targetListId = '<your list id>';
$apiKey = '<your api key>';
$mailChimp = new MailChimpWrapper($apiKey);
$title = 'hogehoge';
$subject = 'hogehoge';
$fromName = 'hogehoge';
$replyTo = 'hogehoge@exaple.com';

$result = $mailChimp->createCampaign($targetListId, $title, $subject, $fromName, $replyTo);
$campaignId = $result['id'];
$mailChimp->setMailBody($body, $campaignId);
```

