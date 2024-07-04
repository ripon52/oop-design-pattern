<?php

interface Observer
{
    public function update($data);
}

interface Subject
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}


class PostSubject implements Subject
{
    private $observers = [];
    private $post;

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $this->observers = array_filter(
            $this->observers,
            function ($obs) use ($observer) {
                return $obs !== $observer;
            }
        );
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->post);
        }
    }

    public function uploadPost($post)
    {
        $this->post = $post;
        $this->notify();
    }

    public function getPost()
    {
        return $this->post;
    }
}

class UserObserver implements Observer {
    public function update($post) {
        echo "UserObserver: A new post was uploaded: $post </br>";
    }
}

// Create the subject
$postSubject = new PostSubject();

// Create an observer
$userObserver = new UserObserver();

// Attach the observer to the subject
$postSubject->attach($userObserver);

// Upload a new post
$postSubject->uploadPost("New blog post about Observer Pattern");
$postSubject->uploadPost("Another blog post about Factory Pattern");