# Sorting

## Blocks of text

### Single-line blocks

```bash
$ cat unsorted.txt | sed 's/^[ \t]*//' | sort -f > sorted.txt
```

## Constants

### Single-line constants with preceding single-line documentation comments

```bash
$ cat unsorted.txt | sed 's/^[ \t]*//' | awk '{getline x;print x;}1' | paste -d "\t" - - | LC_ALL=C sort -f | tr '\t' '\n' | awk '{getline x;print x;}1' > sorted.txt
```

## Cases in switch statements

### Keywords `case` and `return` on two separate single lines

```bash
$ cat unsorted.txt | sed 's/^[ \t]*//' | paste -d "\t" - - | sort -f | tr '\t' '\n' > sorted.txt
```

### Keywords `case` and `return` on same single line

```bash
$ cat unsorted.txt | sed 's/^[ \t]*//' | sort -f > sorted.txt
```
