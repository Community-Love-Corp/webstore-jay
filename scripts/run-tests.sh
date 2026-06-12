#!/bin/bash

LOGFILE="test-output.txt"

echo "==== Test Run: $(date '+%Y-%m-%d %H:%M:%S') ====" >> "$LOGFILE"
php artisan test --colors=never >> "$LOGFILE"
echo "" >> "$LOGFILE"