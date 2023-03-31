name = 'Nevena';

console.log(name);

// var name;

var a = 5;

function sum(b, c, k = 4) {
    var d = 8;

    if (b > 5) {
        let f = 8;
        const e = 9;

        console.log(a + b + c + f);
    }

    // console.log(f);

    console.log(k)

    console.log(a + b + c + d);
}

// console.log(d);

sum(7, 6, 8, 9, 7);
sum(7, 6, 8);
sum(9, 4);
sum(4);

console.log(1 == '1');
console.log(1 === '1');
console.log(1 + '1');
console.log(1 + +'1');
console.log('2' - '1');
console.log(2 - '1fdfdf');

const array = [1, 5, 8, 9];
array[1] = 9;
array.push(6);
console.log(array);

// array = [1, 8, 8];

array.pop();

array.unshift(7);
array.shift();

array.splice(1, 2);

console.log(array)

array.splice(1, 0, 6);
console.log(array)

array.splice(2, 1, 4)
console.log(array)

console.log(array.slice(1, 2));
console.log(array);

array.forEach(function (value, index) {
    console.log(`${index}: ${value}`);
});

const doubledArray = array.map(function (value) {
    return value * 2;
});

console.log(array);
console.log(doubledArray);

const result = array.filter(function (value) {
    return value % 2 === 0;
});

console.log(result);

const arraySum = array.reduce(function (sum, value) {
    return sum + value;
}, 0);

console.log(arraySum)

const arr = ['Hello', ',', 'world', '!'];
const greeting = arr.reduce(function (greeting, value, index) {
    const greetingEnd = index < arr.length - 1 ? ' ' : '';
    return greeting + value + greetingEnd;
}, '');

console.log(greeting)

const student = {
    name: 'Student name',
    age: 22,
    fn: 66666,
    address: {
        city: 'Sofia',
        country: 'Bulgaria'
    }
};

student['name'] = 'Student Name';
student.age = 23;
student.mark = 6;

console.log(student);

for (let key in student) {
    console.log(student[key]);
}

for (let index in array) {
    console.log(array[index])
}

for (let value of array) {
    console.log(value)
}

const copiedStudent = Object.create(student);
student.info = function () {
    console.log(`${student.fn}: ${student.name}`)
}

student.info();
copiedStudent.info();

copiedStudent.greeting = function () {
    console.log(`Hello, ${copiedStudent.name}`);
}
copiedStudent.greeting();
// student.greeting();
copiedStudent.address.city = 'Burgas';
console.log(student)

const freezedStudent = Object.freeze(student);
freezedStudent.mark = 5;
console.log(freezedStudent);
freezedStudent.prop = 'adsds';
console.log(freezedStudent);
freezedStudent.address.city = 'Plovdiv'
freezedStudent.address.street = 'Hristo Smirnenski'
console.log(freezedStudent);

console.log(Object.keys(student))
Object.keys(student).forEach(function (key) {
    console.log(`${key}: ${student[key]}`)
})
Object.values(student).forEach(function (value) {
    console.log(value)
})
console.log(Object.entries(student))
Object.entries(student).forEach(function ([ key, value ]) {
    console.log(`${key}: ${value}`)
})

const entries = Object.entries(student)
for (let index in entries) {
    let entry = entries[index]
    console.log(`${entry[0]}: ${entry[1]}`)
    let [ key, value ] = entries[index]
}

for (let value of Object.entries(student)) {
    console.log(`${value[0]}: ${value[1]}`)
}