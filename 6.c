#include <stdio.h>

int main(void)
{
	int const LIMIT = 100;
	int sum = 0;
	int sumSquares = 0;
	int squareSum = 0;
	
	for(int i = 1; i <= LIMIT; i++) {
		sum += i;
		sumSquares += (i * i);
	}
	squareSum = sum * sum;
	
	printf("Sum of squares = %d\nSquare of sums = %d\nDifference = %d\n", sumSquares, squareSum, squareSum - sumSquares);
}