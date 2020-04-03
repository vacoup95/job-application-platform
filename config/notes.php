<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Note allowed to morph to...
    |--------------------------------------------------------------------------
    |
    | Define the models that you allow a note to be morphed to, inside validation
    | this will be used to make sure users don't allow notes to random models inside the database.
    |
    */

    'allowed' => [
        'App\Application',
        'App\Progress',
    ],

];
