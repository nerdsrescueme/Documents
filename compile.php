<?php

/**
* Document compiler
*
* The document compiler reads all files within subfolders, performing two
* operations on the data.
*
* 1. Reads metadata document and provides this data to the markdown files
* 2. Compiles all markdown documents into one file applying metadata settings
*
* @author    Nerds, Rescue Me!
* @link      http://nerdsrescue.me
*/

namespace Documentation;

// Import markdown parser.
require __DIR__ . '_vendor/markdown.php';

