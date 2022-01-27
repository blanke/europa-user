# europa-user
API-Gateway to persist the selected initiatives for a specified session

### Examples
#### get session informations
```
/session.php?id=<sessionId>
```
returns 
```
{"initiatives": [1536,12228,12263,12567,12616,12990,13237,7567584,12054,13225], "mapping": [[1,"2021/0097(CNS)"]]}
```
#### add initiative
```
/checkInitiative.php?id=<sessionId>&initiative=<initiativeId>&checked=true
```
returns
```
{"initiatives": [1536,12228,12263,12567,12616,12990,13237,7567584,12054,13225], "mapping": [[1,"2021/0097(CNS)"]]}
```
#### remove initiative
```
/checkInitiative.php?id=<sessionId>&initiative=<initiativeId>
```
returns
```
{"initiatives": [1536,12228,12263,12567,12616,12990,13237,7567584,12054,13225], "mapping": [[1,"2021/0097(CNS)"]]}
```
