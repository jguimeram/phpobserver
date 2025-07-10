<?php

namespace Observer\subscriber;

use SplSubject;
use SplObserver;


class SubscriberClass implements SplObserver{
      public function update(\SplSubject $subject): void{
      echo $subject->getData();
      }

}