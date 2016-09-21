#include <stdio.h>
#include <math.h>


int pathIsValid(long path, int gridSize);

int main (void) {
	const int gridSize = 10;
	int movements = gridSize * 2;
	long limit = pow(2, movements);
	int validPaths = 0;
	
	long path = 0;
	while (path <= limit / 2) {
		if (pathIsValid(path, gridSize) == 1) {
			validPaths++;
		}
		
		path++;
	}
	
	validPaths = validPaths * 2;
	
	printf("A %dx%d grid has %d valid paths\n", gridSize, gridSize, validPaths);
}

// Path is valid if the bitwise representation of the number contains half 1s and half 0s
int pathIsValid(long path, int gridSize) {
	// Count the number of bits set - http://graphics.stanford.edu/~seander/bithacks.html#CountBitsSetKernighan
	unsigned int bitsSet; // c accumulates the total bits set in v
	for (bitsSet = 0; path; bitsSet++) {
		path &= path - 1; // clear the least significant bit set
		if (bitsSet > gridSize) {
			return 0;
		}
	}
	
	
	if (bitsSet == gridSize) {
		return 1;
	}
	else {
		return 0;
	}
}