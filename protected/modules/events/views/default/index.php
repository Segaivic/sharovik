<?php
$this->pageTitle = 'События - '.Yii::app()->name;
$this->widget('ext.EFullCalendar.EFullCalendar', array(
// polish version available, uncomment to use it
    'lang'=>'ru',
// you can create your own translation by copying locale/pl.php
// and customizing it

// remove to use without theme
// this is relative path to:
// themes/<path>
    'themeCssFile'=>'cupertino/theme.css',

    // raw html tags
    'htmlOptions'=>array(
    // you can scale it down as well, try 80%
    'style'=>'width:100%'
    ),
    // FullCalendar's options.
    // Documentation available at
    // http://arshaw.com/fullcalendar/docs/
    'options'=>array(
    'header'=>array(
    'left'=>'prev,next',
    'center'=>'title',
    'right'=>'today'
    ),
    'lazyFetching'=>true,
    'events'=>'/events/default/calendarEvents'
     // pass array of events directly

    // event handling

    )
    ));