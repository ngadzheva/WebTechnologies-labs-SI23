name = 'Super global';
const ivan = { name: 'Ivan', age: 22 };
const dragan = { name: 'Dragan', age: 22 };
const petkan = { name: 'Petkan', age: 22 };

function greeting(a, b, c) {
    console.log(`Hello, ${this.name}`);
}

// greeting();

ivan.greeting = greeting;
// ivan.greeting();

// greeting.call(dragan, 1, 2, 3);
// ivan.greeting.apply(petkan, [1, 2, 3]);

dragan.sayHi = function () {
    console.log(`Hi, ${this.name}`);
}

dragan.sayHi();
const hi = dragan.sayHi.bind(dragan);
hi();
