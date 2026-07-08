console.log("Fundamentals");
import { test, expect } from '@playwright/test';

//1. Types - name followed by colon, and then type. For return types - function followed by colon, and then return type.
//java -function string greet (string name) {}
function greet(name:string): string {
	// java - return "Hello" + name;
	return `Hello ${ name }`;
}


// 2. Interfaces -
interface User {
	//java- int id;
	id: number;
	//java- string email;
	email: string;
}

// 3. Async wait - when a call is made, continue with operations and another thread spawed to wait till response received.
// function starts with async, and to indicate the contract, after function there is a colon, followed by phrase 'Promise' and <'Return Type'>.
async function fetchUser(): Promise<User>{
	return { id: 1, email: "test@example.com"}
}

// 4. GENERICS	- If you used the any type, TypeScript would completely stop checking the type. 
// By using a generic T, the compiler remembers exactly what went into the function, and 
// enforces that the output matches it perfectly, preventing hidden runtime bugs. 
// e.g. for function below 'const result3 = Wrap(true); has to return boolean.

//Note after the function name, like in the Promise syntax, the Type value is listed. 
// In this case, 'T' stands for 'any'. 
function Wrap<T>(value: T): T {
	return value;
}

// 5. UNION Types with Type Narrowing when variable used
function printId(id: number | string){
	//console.log(): This prints the final string into your developer console.
	console.log(id);
	//use typeof
    if (typeof id === "string") {
        // TypeScript knows 'id' is a string here
        console.log(`String ID: ${id.toUpperCase()}`);
    } else {
        // TypeScript knows 'id' must be a number here.
		//.toFixed(2): This Number.prototype.toFixed() method converts the number into a string, and 
		// rounds it to 2 decimal places. If the number is whole, 
		// it pads the end with zeros (e.g., 5 becomes "5.00").
        console.log(`Number ID: ${id.toFixed(2)}`);
    }

}

//6. Type Alias and creating an instance of an object using const variable- Writing number | string repeatedly makes code messy. 
// A Type Alias allows you to create a custom name for your type configuration
//  using the type keyword, making your code cleaner and reusable

// Define the type alias
type ID = number | string;

// Use the alias in your function
function printIdClean(id: ID) {
    console.log(id);
}

// Reuse it elsewhere
//java -userAccount ua = new userAccount ("admin-456", "Alex");
const userAccount: { id: ID; name: string } = {
    id: "admin-456",
    name: "Alex"
};

//7. Intersection types (&) vs. Union Types (|)
/*While a Union Type (|) means "OR" (the value is one type or another), 
an Intersection Type (&) means "AND". It combines multiple existing types 
into a single new type that contains all features of the combined types. 
Intersection types are typically used with objects rather than 
primitive values like strings or numbers. [18] 
*/
type Employee = {
    id: number;
    name: string;
};
type Permissions = {
    isAdmin: boolean;
    canEdit: boolean;
};
// Intersection: Admin Worker MUST have all properties from both types

type AdminWorker = Employee & Permissions;
const manager: AdminWorker = {
    id: 101,
    name: "Sarah",
    isAdmin: true,
    canEdit: true
};
/*
## Summary Comparison

* Union (|): Ideal for choosing between alternative data formats (e.g., string | number).
* Intersection (&): Ideal for mixing and matching reusable object shapes to build larger, more complex structures.  
*/
//8. Optional Fields
interface Product {
	name: string;
	price?: number;
}

// 9. Classes
/*	java-  public class Person { 
				private string name; 
				Public Person(string name){
					this.name = name;
				}
			}
*/
class Person {
	constructor (public name:string) {}
}
/*
-- Why this works?
This feature is called Parameter Properties. It is a TypeScript shorthand that:

- does three things at once:

a. Declares a class property named name.
b. Sets the accessibility modifier to public.
c. Automatically assigns the incoming argument to the property (this.name = name).

Basically, it is identical to:

class Person {
    public name: string;

    constructor(name: string) {
        this.name = name;
    }
}
----
*/

// 10. Array objects - 'filtered' variable in code below returns ["a@b.com"]
const emails = ["a@b.com", "c@d.com"];
const filtered = emails.filter(e=>e.includes("a"));

//11. Lambda
/*
Yes, => is a lambda expression, though in JavaScript and TypeScript it is officially called an Arrow Function. 
It provides a short, concise syntax to write functions. 
## Syntax Comparison
Instead of using the traditional function keyword, you place the arrow => between the parameters and the function body: [6, 7] 
*/

//11.1 Lamda function

// Traditional Function Expression
const add = function(a: number, b: number) {
    return a + b;
};
// Lambda / Arrow Function
const addArrow = (a: number, b: number) => a + b;
/*
## Key Characteristics

* Implicit Return: If the function body is a single line, you can omit the curly braces {} and the return keyword. It automatically returns the result of that expression. [8, 9, 10] 
* Lexical this: Unlike traditional functions, arrow functions do not create their own this context. They inherit this from the surrounding code block, which makes them highly useful when working inside classes or callbacks.

## Common Use Cases
You will frequently see lambda expressions used as callbacks inside array methods like .map(), .filter(), or .forEach():
Here is what happens when it executes:

a.Input: An array with two numbers: [2, 4].
b.Process: The .map() method loops through the array and passes each element into your arrow function num => num * 2.
c. Output: A brand-new array [4, 8] is created and stored inside doubled. 
*/
const numbers =[2,4];
// Using an arrow function to double each number

const doubled = numbers.map(num => num * 2); 

//Use Case 2
const names = ["Alice", "Bob", "Charlie"];

// A simple one-line forEach loop
 names.forEach(name => console.log(`Hello, ${name}!`));

/*
To help you master this syntax, let me know if you would like to explore:

* How arrow functions handle this bindings compared to standard Java or TypeScript methods.
* How to write multi-line arrow functions that require curly braces.
* How to return an object literal implicitly without breaking the syntax. [12, 13] 
*/

//12. of 12. Const objects

/* const is not equivalent to creating a class object. [1] 
## Key Differences

* const: Declares a block-scoped variable that cannot be reassigned. It does not create structures, templates, or instances.
* Class: A blueprint or template for creating objects with predefined properties and methods. [2, 3, 4, 5] 

## How They Compare

* What you wrote (Plain Object):
You created a direct, one-off data literal. It only exists as that single object.
* Class Alternative:
You would first define a reusable blueprint, then instantiate it using the new keyword. [6, 7, 8] 

## Code Comparison
Here is how your code looks as a plain object versus using a class:
Your Approach (Plain Object)

// A single, one-off object
 
*/
const userAccount1 = { 
  id: 'admin-456', 
  name: 'Alex' 
};

//Class Approach (Blueprint + Instance)

// 1. Define the blueprint
class User1 {
  id: string;
  name: string;

  constructor(id: string, name: string) {
    this.id = id;
    this.name = name;
  }
}
// 2. Create the object instance using 'new'
const userAccount3 = new User1('admin-456', 'Alex');
// a version of const, which can be updated later - let, unlike variable created using const keyword:
let userAccount2 = new User1('admin-456', 'Alex');


const userAccount4: User1 = {
    id: "admin-56",
    name: "Sarah",
};

/*
You use the const object by accessing its internal data (properties) or passing the object into functions. [1] 
Here are the most common ways to use it:
## Accessing Properties
You can read the data inside the object using dot notation or bracket notation. [2, 3] 

* Dot Notation: The most common way.
*/
console.log(userAccount.name); // Outputs: Alex
console.log(userAccount.id);   // Outputs: admin-456

//* Bracket Notation: Useful if the property name is stored in a variable.

const key = 'name';
console.log(userAccount[key]); // Outputs: Alex


//## Modifying Properties
//Even though the object is declared with const, you can still change the values inside the object. 
// const only stops you from overwriting the entire variable with a new object. 

userAccount.name = 'Alex Smith'; // This works completely fine!
// This will cause an error, because you cannot reassign a const variable:
userAccount2 = { id: 'admin-789', name: 'Sam' }; 

//## Passing to Functions
//You can pass the object into functions to perform actions with its data. [11, 12] 

function greetUser(user: { id: string; name: string }) {
  console.log(`Hello, ${user.name}! Your ID is ${user.id}.`);
}

greetUser(userAccount2); // Outputs: Hello, Alex! Your ID is admin-456.

//## Destructuring
//You can unpack the properties into standalone variables for cleaner code. 

const { name, id } = userAccount;
console.log(name); // Outputs: Alex
