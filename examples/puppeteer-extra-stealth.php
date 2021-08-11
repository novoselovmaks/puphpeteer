<?php

require __DIR__ . '/../vendor/autoload.php';

use Nesk\Puphpeteer\Puppeteer;

$puppeteer = new Puppeteer([
    'js_extra' => /** @lang JavaScript */ "
            const puppeteer = require('puppeteer-extra');
            const StealthPlugin = require('puppeteer-extra-plugin-stealth');
            puppeteer.use(StealthPlugin());
            instruction.setDefaultResource(puppeteer);
        "
]);
$browser = $puppeteer->launch();

$page = $browser->newPage();

$page->goto('https://bot.sannysoft.com');
$page->waitForTimeout(5000);
$page->screenshot(['path' => 'example2.png', 'fullPage'=> true]);

$browser->close();