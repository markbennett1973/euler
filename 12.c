#include <stdio.h>
#include <math.h>

int countDivisors(long);

int main (void) {
	long counter = 1, sum = 0;
	int divisorCount = 0;
	
	while (divisorCount <= 500) {
		sum += counter;
		divisorCount = countDivisors(sum);
		
		counter++;
	}

	printf("%ld has %d divisors\n", sum, divisorCount);
	
}

int countDivisors(long target) {
	int divisorCount = 0;
	long current = 1;
	float limit = sqrt(target);
	
	while (current < limit) {
		if (target % current == 0) {
			divisorCount += 2;
		}
		
		current++;
	}
	
	// Don't forget perfect squares!
	if (current == limit) {
		divisorCount++;
	}
	
	return divisorCount;
}