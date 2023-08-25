<?php
    $date_time = date('F j e m s');
    echo $date_time.'<br/>';

    $comments = [
        'Good', 'I like it', 'How are you?'
    ];
    if (!empty($comments)) {
        print_r($comments);
    } else {
        echo "There is no comments";
    }
    echo '<br/>';

    // =>
    echo !empty($comments) ? print_r($comments) : "There is no comments";
    echo '<br/>';

    $first_comment = !empty($comments) ? ($comments[0]) : "There is no comments";
    echo $first_comment;

    // coalescing operator ??
//    $seconde_comment = $comments[1] ?? 'There is no seconde cmt';
//    echo $seconde_comment;

    ?>