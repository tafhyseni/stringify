# Stringify Documentation

Stringify manipulates strings, html code in a simple and elegant way!



## Plain strings

| method                                                       | params                    |
| ------------------------------------------------------------ | ------------------------- |
| **first**<br />*get first character/s from string*    | *int*<br />`length`        |
| **last**<br />*get last character/s from string*    | *int*<br />`length`        |
| **removeCharater**<br />*removes character/s from string*    | *string*<br />`my`        |
| **removeFirstChar**<br />*removes first character*           |                           |
| **removeFirstChars**<br />*removes first characters*         | Integer                   |
| **removeLastChar**<br />*removes last character*             | `3`                       |
| **removeLastChars**<br />*removes last characters*           | Integer<br />`2`          |
| **removeAfter**<br />*removes string after certain string*   | *string*<br />`afterhere` |
| **removeNumbers**<br />*removes numbers from string*         |                           |
| **count**<br />*counts string length*                        |                           |
| **countWords**<br />*counts number of words inside a string* |                           |
| **startWithUpperCase**<br />*string starts with uppercase*   |                           |
| **startWithLowerCase**<br />*string starts with lowercase*   |                           |
| **toUpperCase**<br />*entire string gets converted to uppercase* |                           |
| **toLowerCase**<br />*entire string gets converted to lowercase* |                           |
| **toCamelCase**<br />*converts underscores in string to camelCase version* |                           |
| **chunk**<br />*chunks a string into length separated pieces* | *int*<br />               |
| **chunkBy**<br />*chunk a string into length separated pieces, separated by..* | *string*, *length*        |
| **append**<br />*append to string*   |   *string*                        |
|                                                              |                           |



### To array

| method                                                       | params           |
| ------------------------------------------------------------ | ---------------- |
| **toArray**<br />*converts string to array on each specified number of characters* | integer<br />`5` |
| **toArrayBy**<br />*converts string to array by a certain character* | String<br />`\ ` |
|                                                              |                  |



### Coding Strings

| method                                                       | params                       |
| ------------------------------------------------------------ | ---------------------------- |
| **removeHTML**<br />*removes all html tags*                  |                              |
| **removeHtmlExpect**<br />*removes all html tags expect a certain tag* | String<br />*example: `<a>`* |

