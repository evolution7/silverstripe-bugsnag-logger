<?php
interface ReleaseStageInterface
{
    /**
     * @return string Textual description of the current release stage
     */
    public function get();
}