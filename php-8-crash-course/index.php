<?php

function divider()
{
    echo "\n" . str_repeat("-", 30) . "\n";
}

/* Null safe operator */

class User
{
    public function profile()
    {
        return new Profile();
        // return null;
    }
}

class Profile
{
    public function emplyoment()
    {
        return 'web development';
    }
}

$user = new User;

// if ($profile = $user->profile()) {
//     echo $profile->emplyoment();
// }

// with nullish coalescing
echo $user->profile()?->emplyoment() ?? 'not provided';

divider();

/* Match expressions */

class Comment
{
};

$obj = new Comment();

// old way using switch
// switch (get_class($obj)) {
//     case 'Conversation':
//         $type = 'started_conversation';
//         break;
//     case 'Reply':
//         $type = 'reply_conversation';
//         break;
//     case 'Comment':
//         $type = 'commented_on_lesson';
//         break;
// }

// echo $type;

$type = match (get_class($obj)) {
    'Conversation' => 'started_conversation',
    'Reply' => 'reply_conversation',
    'Comment' => 'commented_on_lesson',
    default => 'type not found'
};

echo $type;

divider();

/** Constructor Property Promotion */

// normal constructor
class User2
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

// normal constructor
class Plan
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
};

// new way
class Signup
{
    public function __construct(
        protected User2 $user,
        protected Plan $plan
    ) {
    }
};

$user = new User2('pedro');
$plan = new Plan('monthly');
$signup = new Signup($user, $plan);

var_dump($signup);

divider();

/** $object::class
 * (get name of the class, with its namespace)
 * */

echo get_class($user);
echo "\n";
echo $user::class;

divider();

/** Named parameters */

class Invoice
{
    public function __construct(
        private $description,
        private $amount,
        private $date,
        private $paid
    ) {
    }
}

$invoice = new Invoice(
    "Customer instalation",
    10000,
    new DateTime(),
    true
);

$invoice2 = new Invoice(
    description: "Customer instalation",
    amount: 10000,
    date: new DateTime(),
    paid: true
);

var_dump($invoice);
var_dump($invoice2);

divider();

/** New String Helpers */

// str_starts_with
$id = 'inv_asd87980';
$startsOld = strpos($id, 'inv_') === 0; // old way
var_dump($startsOld);

$startsNew = str_starts_with($id, 'inv_'); // new way
var_dump($startsNew);

// str_ends_with
$id2 = 'asd87980_ch';

$endsOld = strpos(strrev($id2), strrev('_ch')) === 0; // old way
var_dump($endsOld);

$endsNew = str_ends_with($id2, '_ch'); // new way
var_dump($endsNew);

// str_contains
$url = 'www.example.com?foo=bar';

$containsOld = strpos($url, '?') !== false;
var_dump($containsOld);

$containsNew = str_contains($url, '?');
var_dump($containsNew);

divider();

/** Weak Maps
 * Like arrays (key value store)
 * But keys are objects
 */

// we cannot use object reference as a key in an array
// $data = [$obj => 'some value'];

// old way would be to use SplObjectStorage
// but it maintains reference to object used as key
// WeakMaps solve that

$store = new WeakMap();
$obj = new stdClass(); // generic class

$store[$obj] = 'foobar';

var_dump($store);
unset($obj); // makes variable undefined 
var_dump($store); // store is empty

// another example

interface Event
{
};

class SomeEvent implements Event
{
};
class AnotherEvent implements Event
{
};

class Dispatcher
{
    protected WeakMap $dispatchCount;

    public function __construct()
    {
        $this->dispatchCount = new WeakMap();
    }

    public function dispatch(Event $event)
    {
        $this->incrementDispatches($event);

        // dispatch event...
    }

    public function incrementDispatches(Event $event)
    {
        // longer way
        // if (!isset($this->dispatchCount[$event])) {
        //     $this->dispatchCount[$event] = 0;
        // }
        // $this->dispatchCount[$event] += 1;

        // leaner way
        $this->dispatchCount[$event] ??= 0;
        $this->dispatchCount[$event] += 1;
    }
};

$dispatcher = new Dispatcher();

$someEvent = new SomeEvent();
$anotherEvent = new AnotherEvent();

$dispatcher->dispatch($someEvent);
$dispatcher->dispatch($someEvent);
$dispatcher->dispatch($anotherEvent);

var_dump($dispatcher);

divider();

/** Union and Pseud Types */

class User3
{

    public function __construct(protected string $name)
    {
    }

    public function makeFriendsWith(User3|string|null $user)
    {
        $result = match (gettype($user)) {
            'object' => "Now {$user->name} is your friend!",
            'string' => "Now {$user} is your friend!",
            'NULL' => "You have a new anonymous friend!",
        };

        var_dump($result);
    }

    // public function hello($msg) // same as mixed type
    public function hello(mixed $msg = "world")
    {
        var_dump("Hello {$msg}");
    }
}

$joe = new User3("joe");
$sam = new User3("sam");

$joe->makeFriendsWith($sam);
$sam->makeFriendsWith($joe);
$sam->makeFriendsWith('pedro@gmail.com');
$sam->makeFriendsWith(null);

$joe->hello();
