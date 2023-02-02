<?php
var_dump(filter_id(12));
var_dump(filter_var('bob@example.com', FILTER_VALIDATE_IP));
var_dump(filter_var('joh nAexample.com', FILTER_SANITIZE_EMAIL));
