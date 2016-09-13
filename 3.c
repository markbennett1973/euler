#include<stdio.h>
#include<math.h>

int isPrime(long target) {
	long current = 3, limit = sqrt(target);
	
	// We only need to check up target/2 - there can't be any factors larger than that.
	while (current <= limit) {
		if (target % current == 0) {
			return 0;
		}
		current += 2;
	}
	
	return 1;
}

int main(void) {
	const long TARGET = 600851475143;
	long current = 2, limit = sqrt(TARGET);
	
	// We only need to check up sqrt(target)
	while (current <= limit) {
		if (TARGET % current == 0 && isPrime(current) == 1) {
			printf("Found prime factor: %ld\n", current);
		}
		
		current++;
	}
	
	printf("\n");
}