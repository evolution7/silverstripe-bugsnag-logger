<?php
/*
 * This file is part of the Silverstripe Bugsnag Logger.
 *
 * (c) Evolution 7 <http://www.evolution7.com.au>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
require_once 'Zend/Log/Writer/Abstract.php';
require_once __DIR__ . '/../../vendor/bugsnag/bugsnag/src/Bugsnag/Autoload.php';

/**
 * Sends an error message to Bugsnag.
 *
 * @see SS_Log for more information on using writers.
 *
 * @package bugsnag-logger
 */
class E7_BugsnagLogger extends Zend_Log_Writer_Abstract {

    private $bugsnag;

    /**
     * Constructor
     *
     * @param Bugsnag_Client $bugsnag
     */
    public function __construct(Bugsnag_Client $bugsnag, ReleaseStageInterface $releaseStage = null) {
        $this->bugsnag = $bugsnag;
        if (!$releaseStage) {
            $releaseStage = new ReleaseStage();
        }
        $this->bugsnag->setReleaseStage($releaseStage->get());
    }

    /**
     * Factory function for creating a new log writer
     *
     * Generally unused
     * @param  Bugsnag_Client $bugsnag
     * @return E7_BugsnagLogger
     */
    public static function factory($bugsnag) {
        return new E7_BugsnagLogWriter($bugsnag);
    }

    /**
     * Starts the logger and returns the related Bugsnag_Client instance
     *
     * @param  string $apiKey The Bugsnag API Key for the application
     * @return Bugsnag_Client The instance of the Bugsnag_Client used
     */
    public static function enableWithApiKey($apiKey, ReleaseStageInterface $releaseStage = null)
    {
        $bugsnag = new Bugsnag_Client($apiKey);
        SS_Log::add_writer(new E7_BugsnagLogger($bugsnag, $releaseStage), SS_Log::ERR);
        return $bugsnag;
    }

    /**
     * Sends the error message to Bugsnag
     *
     * As Silverstripe internally converts all Exceptions to regular PHP errors
     * we will only report PHP errors
     */
    public function _write($event) {
        // We only want to log real errors which will come as an array
        if (!is_array($event)) {
            return;
        }
        $event = $event['message'];
        $this->bugsnag->errorHandler($event['errno'], $event['errstr'], $event['errfile'], $event['errline'], $event['errcontext']);
    }

}