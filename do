#!/bin/bash
if [ -z "$1" ]; then 
	echo usage: $0 sourceFile
    exit
fi

SRC=$1
gcc -o bin/$SRC $SRC.c
time ./bin/$SRC