#include <stdio.h>
#include <math.h>

int isPrime(long target) {
	long current = 3, limit = sqrt(target);
	
	// We only need to check up sqrt(target) - there can't be any factors larger than that.
	while (current <= limit) {
		if (target % current == 0) {
			return 0;
		}
		current += 2;
	}
	
	return 1;
}

int main(void) {
	int current = 1;
	int found = 0;
	int const LIMIT = 10001;
	
	while (found < LIMIT) {
		current++;
		if (isPrime(current)) {
			found++;
		}
	}

	printf("The %dth prime number is %d\n", found, current);
}