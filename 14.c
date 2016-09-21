#include <stdio.h>

long getChainLength(long start);
long getNextNumber(long current);

int main (void) {
	long longestChain = 0, longestChainSeed = 0, start = 1;
	
	while (start < 1000000) {
		long length = getChainLength(start);
		if (length > longestChain) {
			longestChain = length;
			longestChainSeed = start;
		}
		start++;
	}
	
	printf("Longest seed is %ld with length %ld\n", longestChainSeed, longestChain);
}

long getChainLength(long start) {
	int length = 1;
	while (start != 1) {
		start = getNextNumber(start);
		length++;
	}
	
	return length;
}

long getNextNumber(long current) {
	if (current % 2 == 0) {
		return current / 2;
	}
	else {
		return 3 * current + 1;
	}
}