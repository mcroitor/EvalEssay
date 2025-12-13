## Sample solution

```bash
#!/bin/bash
# cleanup.sh - A script to clean up temporary files from a specified directory
# Usage: ./cleanup.sh <directory> [file_extension1 file_extension2 ...]
# Default file extension to delete: .tmp
# Check if at least one argument (directory) is provided
if [ $# -lt 1 ]; then
    echo "Usage: $0 <directory> [file_extension1 file_extension2 ...]"
    exit 1
fi

DIRECTORY=$1
shift

# Check if the specified directory exists
if [ ! -d "$DIRECTORY" ]; then
    echo "Error: Directory '$DIRECTORY' does not exist."
    exit 1
fi

# Default file extension to delete
if [ $# -eq 0 ]; then
    FILE_EXTENSIONS=(".tmp")
else
    FILE_EXTENSIONS=("$@")
fi

# Initialize counter for deleted files
DELETED_COUNT=0

# Loop through each specified file extension and delete matching files
for EXT in "${FILE_EXTENSIONS[@]}"; do
    FILES_TO_DELETE=("$DIRECTORY"/*"$EXT")
    for FILE in "${FILES_TO_DELETE[@]}"; do
        if [ -e "$FILE" ]; then
            rm "$FILE"
            ((DELETED_COUNT++))
        fi
    done
done

# Output the number of deleted files
echo "Deleted $DELETED_COUNT files."
exit 0
```
