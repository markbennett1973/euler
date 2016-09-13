#include <stdio.h>

int isDivisible(number, maxFactor)
{
	for(int divisor = 1; divisor <= maxFactor; divisor++) {
		if (number % divisor != 0) {
			return 0;
		}
	}
	
	return 1;
}

int main(void)
{
	int const divisor = 20;
	
	int current = divisor;
	while(1 == 1) {
		if (isDivisible(current, divisor) == 1) {
			printf("Found %d\n", current);
			return 0;
		}
		
		current += divisor;
	}
	
	return 0;
}