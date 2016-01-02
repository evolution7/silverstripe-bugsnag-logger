<?php
/*
 * This file is part of the Silverstripe Bugsnag Logger.
 *
 * (c) Evolution 7 <http://www.evolution7.com.au>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Interface for ReleaseStage objects for use with the BugsnagLogger
 */
interface ReleaseStageInterface
{
    /**
     * @return string Textual description of the current release stage
     */
    public function get();
}
