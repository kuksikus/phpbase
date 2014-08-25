<?php

namespace {
    class ActionStub implements \PhpBase\Mvc\IAction
    {
        public function __construct($body) {
            $this->body = $body;
        }


        public function run(\PhpBase\Mvc\Request $request)
        {
            $response = new ResponseStub;
            $response->setBody($this->body);
            return $response;
        }
    }
}


namespace TestNamespace {

    class Index implements \PhpBase\Mvc\IAction
    {
        public function run(\PhpBase\Mvc\Request $request)
        {
            return null;
        }
    }

    class Notfound implements \PhpBase\Mvc\IAction
    {
        public function run(\PhpBase\Mvc\Request $request)
        {
            return null;
        }
    }
}


namespace TestNamespace\Subname {
    class Action implements \PhpBase\Mvc\IAction
    {
        public function run(\PhpBase\Mvc\Request $request)
        {
            return null;
        }
    }
}
