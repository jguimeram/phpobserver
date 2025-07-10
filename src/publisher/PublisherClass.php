<?php

namespace Observer\publisher;

use SplSubject;
use SplObserver;

class PublisherClass implements SplSubject{
   
   
    private array $observersList = [];

    public function __construct(private string $data = "")
    {}

    public function attach(SplObserver $observer): void{
        $this->observersList[spl_object_hash($observer)] = $observer;
    }

    public function detach(SplObserver $observer): void{
        unset($this->observersList[spl_object_hash($observer)]);
    }

    private function listAllSubscribers(){
        foreach($this->observersList as $observer){
            $observer->update($this);
        }
    }

    public function getData(){
        return $this->data;
    }

    public function setNewData(string $data){
        $this->data = $data;
    }

    public function notify(): void{
        $this->listAllSubscribers();
    }


}