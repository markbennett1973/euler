#include <stdio.h>
#include <math.h>

long factorial(int start, int end);

// TODO: This blows long at gridSize = 14 - we need to get to 20.
int main (void) {
	const int gridSize = 14;
	long top = factorial(gridSize + 1, gridSize * 2);
	long bottom = factorial(1, gridSize);
	long validPaths = top / bottom;
	printf("Top = %ld, bottom = %ld\n", top, bottom);
	printf("A %dx%d grid has %ld valid paths\n", gridSize, gridSize, validPaths);
}

long factorial(int start, int end) {
	long result = 1;
	while (start <= end) {
		result = result * start;
		start++;
	}
	
	return result;
}