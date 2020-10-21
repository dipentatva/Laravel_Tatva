#!/bin/bash

php /tatva/api/artisan schedule:run > /dev/stdout 2>/dev/stderr ;
