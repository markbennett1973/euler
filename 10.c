#include <stdio.h>
#include <math.h>


int isPrime(long target) {
	// We only need to check up sqrt(target) - there can't be any factors larger than that.
	long current = 2, limit = sqrt(target);

	// Special case for target == 1	
	if (target == 1) {
		return 0;
	}
	
	while (current <= limit) {
		if (target % current == 0) {
			return 0;
		}
		
		// After we've checked 2, increment in twos - there's no point checking any other even numbers
		if (current == 2) {
			current++;
		}
		else {
			current += 2;
		}
	}

	return 1;
}

int main(void) {
	long sum = 0;
	long const LIMIT = 2000000;
	
	for(long i = 1; i < LIMIT; i++) {
		if (isPrime(i) == 1) {
			sum += i;
		}
	}
	
	printf("Sum of primes is %ld\n", sum);
}