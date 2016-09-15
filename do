#!/bin/bash
#
# Really simple shell script to compile a source file, then run it and time the execution
#
# Compiled files are put in the bin directory so they can be .gitignored
if [ -z "$1" ]; then 
	echo usage: $0 sourceFile
    exit
fi

SRC=$1
gcc -o bin/$SRC $SRC.c
time ./bin/$SRC