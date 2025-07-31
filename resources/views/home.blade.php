<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ul>
        <li>One</li>
        <li>two</li>
        <li>Three</li>
        <li>Four</li>
    </ul>

    <?php
    $name = 'asif';
    $players = ['shah sahb', 'asif sahb', 'khan sahb'];
    echo '<hr>';
    echo '<h2>Players Name With PHP</h2>';
    echo '<hr>';
    echo '<ul>';
    foreach ($players as $player) {
        # code...
        echo '<li>' . $player . '</li>';
    }
    echo '</ul>';
    echo '<h1>hello</h1>';
    echo '<p>lorem ipsum</p>';
    ?>

    <hr>

    <h2>Players Name With Blade</h2>
    <ul>
        @foreach ($players as $player)
            <li>{{ $player }}</li>
        @endforeach
    </ul>

    {{-- Conditional Rendering --}}
    @if ($name== 'zain')
        <span>Admin {{$name}} Logged In</span>
        @else
        <span>User Logged In</span>
    @endif



    <h1><?php echo $name; ?></h1>
    <h1>{{ $name }}</h1>
</body>

</html>
