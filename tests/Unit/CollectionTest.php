<?php

test('it was an collection', function () {
	$collection = collect([1, 2, 3, 4]);

	expect($collection)->toBeObject();
	expect($collection[1])->toBeInt();
});