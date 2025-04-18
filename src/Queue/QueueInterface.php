<?php
namespace WangGe\Queue;

interface QueueInterface
{
    public function add($url);

    public function queued($url);

    public function next();

    public function count();

    public function queuedCount();

    public function isQueued($url);

    public function clean();
}