<?php

/*
 * This plugin is meant to be included with `moodle-plugin-ci add-plugin`
 * Then use: moodle-plugin-ci add-config -- "require_once(__DIR__.'/local/behatdummy/behat_config.php');"
 * You can then use behat with --profile=chrome, additionally using the fixed selenium image from HQ
 * called moodlehq/selenium-standalone-chrome:3.141.59-20210929-moodlehq
 *
 */

$CFG->behat_profiles['chrome']['capabilities'] = [
    'browserName' => 'chrome',
    'extra_capabilities' => [
        'chromeOptions' => [
            'args' => [
                // Disable the sandbox.
                // https://peter.sh/experiments/chromium-command-line-switches/#no-sandbox
                // Recommended for testing.
                'no-sandbox',

                // Disable use of GPU hardware acceleration.
                // https://peter.sh/experiments/chromium-command-line-switches/#disable-gpu
                //
                // This ensures that the rendering is done in software and works around a bug in Chrome.
                // This may be fixed by https://bugs.chromium.org/p/chromedriver/issues/detail?id=3667 but we
                // cannot upgrade until Chrome 89 is released due to another bug in Chromedriver.
                'no-gpu',

                // Chrome headless mode.
                //
                // Add the 'headless' argument to chrome.
                // https://peter.sh/experiments/chromium-command-line-switches/#headless
                //
                // Note: Chrome args _should not_ include the leading `--`.
                // https://chromedriver.chromium.org/capabilities
                'headless',
            ],
        ],
    ],
];
