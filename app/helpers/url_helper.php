<?php
/**
 *Helpers to redirect after @Users registration
 */

// Simple page redirect
function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}