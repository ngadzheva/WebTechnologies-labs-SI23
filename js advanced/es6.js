const person = { name: 'Name', age: 22 };
const person2 = { name: 'Name', age: 22, prop: 222 };
const { name: firstName, age, fn = 66666 } = person;
console.log(firstName);
console.log(age);
console.log(fn);

function asdf({name, age}) {
    console.log(name)
}

asdf(person)
asdf(person2)

const numbers = [1, 2, 3, 4];
const [ first, second ] = numbers;
console.log(first)
console.log(second)

let a = 5;
let b = 6;

[ b, a ] = [a, b]
console.log(a)
console.log(b)