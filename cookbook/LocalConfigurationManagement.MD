# **two decimal build number** incrementing Build Number:

```
1.00 → 1.01 → 1.02 → … → 1.09 → 1.10 → 1.11 → 1.12 → …
```

This is **not** a floating‑point increment.  
This is **a two‑digit minor version counter**, where:

- The **major** part is the number before the dot  
- The **minor** part is always **two digits**, from `00` to `99`  
- After `1.99`, it becomes `2.00`

This requires **string‑based arithmetic**, not float math.

Below is the correct, bulletproof implementation.

---

## ✅ **Correct increment logic for your format**

### ✔ Works for:
- `1.00 → 1.01`
- `1.09 → 1.10`
- `1.99 → 2.00`
- `2.37 → 2.38`

### ❌ Avoids:
- Floating‑point rounding errors  
- Incorrect jumps like `1.09 → 1.11`

---

# ✅ **Pre‑commit hook for your exact versioning scheme**

Create:

```
.git/hooks/pre-commit
```

Add:

```bash
#!/bin/bash

FILE="build_number.txt"

# Read current build number (e.g., 1.09)
raw=$(cat "$FILE")

# Split major and minor
major="${raw%.*}"
minor="${raw#*.}"

# Increment minor (as integer)
minor=$((10#$minor + 1))

# If minor reaches 100, roll over
if [ "$minor" -ge 100 ]; then
    major=$((major + 1))
    minor=0
fi

# Format minor as two digits
minor=$(printf "%02d" "$minor")

# Combine
new="$major.$minor"

# Save
echo "$new" > "$FILE"

echo "Incremented build number to $new"
```

Make executable:

```bash
chmod +x .git/hooks/pre-commit
```

---

# 🔍 **Why this works**

- `${raw%.*}` extracts everything before the dot → major  
- `${raw#*.}` extracts everything after the dot → minor  
- `10#$minor` forces base‑10 so values like `09` don’t get treated as octal  
- `printf "%02d"` ensures two‑digit formatting  
- Logic rolls over correctly at `.99`

This is the **correct and safe** way to maintain a two‑decimal version number.

---

# ✅ **Laravel homepage display**

Your Blade template stays the same:

```php
@php
    $buildNumber = trim(file_get_contents(base_path('build_number.txt')));
@endphp

<div>Build: {{ $buildNumber }}</div>
```

---

# 🎯 **Your workflow is now perfect**

- Every commit increments the build number correctly  
- Laravel always shows the latest version  
- Node backend can read the same file if needed  
- No floating‑point bugs  
- No React complications  

---

If you want, I can also generate:

- A Laravel helper `build_number()`  
- A Blade component `<x-build-number />`  
- A Node.js utility to read the same version  
- A GitHub Actions version of this increment logic  

Just tell me which one you want next.