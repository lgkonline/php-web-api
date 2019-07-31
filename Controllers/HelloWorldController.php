<?php

class HelloWorldController extends Controller {
    public function Index() {
        return "Hello";
    }

    public function SayHi($id) {
        return "Hi, $id!";
    }
}