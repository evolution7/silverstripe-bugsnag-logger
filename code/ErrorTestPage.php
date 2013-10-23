<?php
/**
 * Class ErrorTestPage
 *
 * This page type always throws an Exception when accessed from the frontend. This is used to test the Bugsnag Logger
 * setup. The exception should be reported to Bugsnag via the API.
 */
class ErrorTestPage extends Page
{

}

class ErrorTestPage_Controller extends Page_Controller
{
    public function init()
    {
        throw new Exception("SilverStripe Test Exception");
    }
}
