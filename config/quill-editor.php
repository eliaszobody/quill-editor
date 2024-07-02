<?php

return [
    // here's where you define any toolbars that you wish to reuse throughout your app

    // toolbars should follow this structure:
    // '<name>' => [
    //     ['<identifier>', '<identifier>', ...],
    //     ['<identifier>', '<identifier>', ...],
    //     ...
    // ],

    // each <identifier> must match the <unique identifier> of a button or dropdown.
    // the list of default buttons and dropdowns can be found in the documentation for this plugin
    // you may also reference any custom buttons or dropdowns that you have defined further down in this config

    // each nested array groups the buttons or dropdowns in the toolbar

    // if you only plan to use the toolbar once, you can define it in the toolbar method of the QuillEditor form field
    // to use a predefined toolbar, pass the <name> of the toolbar into the toolbar method of the QuillEditor form field

    // if the ->toolbar() method is not called on the QuillEditor form field, it will use the 'defaultLeft'
    // and 'defaultRight' toolbars defined below

    'toolbars' => [

        'defaultLeft' => [

        ],

        'defaultRight' => [
            ['undo', 'redo'],
        ],
    ],

    // here's where you register any custom actions to be used by your custom buttons

    // follow this structure for custom actions:
    // '<unique identifier>' => '<javascript function>',

    // be careful not to use a <unique identifier> that already exists in the https://quilljs.com/docs/formats
    // list or in the list of available actions given in this plugin's documentation
    // adding a prefix to all custom actions would guarantee that there will be no overlap (e.g. 'custom-')

    // the <javascript function> should be pretty self explanatory (e.g. 'function () { this.quill.history.undo() }')
    // reading https://quilljs.com/docs/guides/building-a-custom-module might be useful

    'customActions' => [

    ],

    // here's where you register any custom buttons to be passed into a toolbar array or dropdown array

    // follow this structure for custom buttons:
    // '<action identifier>' => '<content>',

    // the <action identifier> should match the <unique identifier> of a custom action

    // a text button's <content> should be a string (e.g. 'Undo')
    // an icon button's <content> should be some sort of icon, ideally svg or blade component (e.g. '<svg>...</svg>')

    'customIconButtons' => [

    ],

    'customTextButtons' => [

    ],

    // here's where you register any custom dropdowns to be passed into a toolbar array

    // follow this structure for custom dropdowns:
    // '<unique identifier>' => [
    //     'label' => '<content>',
    //     'options' => [<button identifier>, <button identifier>, ...],
    // ],

    // the <unique identifier> needs to be unique with all other buttons and dropdowns (custom and dropdown)
    // as it must be recognizable in a toolbar array

    // the <content> for a label may be set to null. if so, it will be assumed that it is a select-style dropdown
    // with only one active value at a time
    // otherwise the <content> is the same as the <content> of a button.
    // if it is a text dropdown it should be a text string
    // if it is an icon dropdown it can be a string of html, ideally an svg or blade component

    // the options array is simply a list of buttons (either custom or default) to display in the dropdown
    // make sure that all of the buttons listed are of the appropriate type (text or icon)
    // all default buttons are icon buttons and should only be used in an icon dropdown

    'customIconDropdowns' => [

    ],

    'customTextDropdowns' => [

    ],
];
