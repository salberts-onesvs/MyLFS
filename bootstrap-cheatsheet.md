# Bootstrap Utility Classes Cheatsheet

## Text Alignment
```html
<div class="text-left">Left aligned</div>
<div class="text-center">Center aligned</div>
<div class="text-right">Right aligned</div>
<div class="text-justify">Justified text</div>
```

## Display
```html
<div class="d-none">Hidden</div>
<div class="d-block">Block</div>
<div class="d-inline">Inline</div>
<div class="d-inline-block">Inline-block</div>
<div class="d-flex">Flexbox container</div>

<!-- Responsive: hidden on mobile, visible on md+ -->
<div class="d-none d-md-block">Show on medium screens and up</div>
```

## Flexbox
```html
<div class="d-flex justify-content-center">Centered horizontally</div>
<div class="d-flex justify-content-between">Space between items</div>
<div class="d-flex justify-content-end">Aligned right</div>
<div class="d-flex align-items-center">Centered vertically</div>
<div class="d-flex flex-column">Stack vertically</div>
```

## Spacing (Margin & Padding)

**Format:** `{property}{sides}-{size}`

| Property | Meaning |
|----------|---------|
| `m` | margin |
| `p` | padding |

| Sides | Meaning |
|-------|---------|
| `t` | top |
| `b` | bottom |
| `l` | left |
| `r` | right |
| `x` | left + right |
| `y` | top + bottom |
| (blank) | all sides |

| Size | Value |
|------|-------|
| `0` | 0 |
| `1` | 0.25rem |
| `2` | 0.5rem |
| `3` | 1rem |
| `4` | 1.5rem |
| `5` | 3rem |
| `auto` | auto |

```html
<div class="mt-3">Margin top 1rem</div>
<div class="mb-5">Margin bottom 3rem</div>
<div class="px-2">Padding left/right 0.5rem</div>
<div class="py-4">Padding top/bottom 1.5rem</div>
<div class="mx-auto">Centered horizontally (auto margins)</div>
<div class="p-3">Padding all sides 1rem</div>
```

## Width & Height
```html
<div class="w-25">Width 25%</div>
<div class="w-50">Width 50%</div>
<div class="w-75">Width 75%</div>
<div class="w-100">Width 100%</div>
<div class="h-100">Height 100%</div>
```

## Colors (Text)
```html
<span class="text-primary">Blue</span>
<span class="text-secondary">Gray</span>
<span class="text-success">Green</span>
<span class="text-danger">Red</span>
<span class="text-warning">Yellow</span>
<span class="text-info">Cyan</span>
<span class="text-dark">Dark</span>
<span class="text-muted">Muted gray</span>
<span class="text-white">White</span>
```

## Colors (Background)
```html
<div class="bg-primary">Blue background</div>
<div class="bg-success">Green background</div>
<div class="bg-danger">Red background</div>
<div class="bg-warning">Yellow background</div>
<div class="bg-light">Light gray background</div>
<div class="bg-dark">Dark background</div>
```

## Borders
```html
<div class="border">All borders</div>
<div class="border-top">Top border only</div>
<div class="border-0">No border</div>
<div class="rounded">Rounded corners</div>
<div class="rounded-circle">Circle</div>
<div class="rounded-0">No rounding</div>
```

## Font
```html
<p class="font-weight-bold">Bold</p>
<p class="font-weight-normal">Normal</p>
<p class="font-weight-light">Light</p>
<p class="font-italic">Italic</p>
<p class="text-uppercase">UPPERCASE</p>
<p class="text-lowercase">lowercase</p>
<p class="text-capitalize">Capitalize Each Word</p>
```

## Visibility
```html
<div class="visible">Visible</div>
<div class="invisible">Invisible (still takes space)</div>
```

## Position
```html
<div class="position-relative">Relative</div>
<div class="position-absolute">Absolute</div>
<div class="position-fixed">Fixed</div>
<div class="fixed-top">Fixed to top</div>
<div class="fixed-bottom">Fixed to bottom</div>
```

## Responsive Breakpoints

| Prefix | Screen Size |
|--------|-------------|
| (none) | All |
| `sm-` | ≥576px |
| `md-` | ≥768px |
| `lg-` | ≥992px |
| `xl-` | ≥1200px |

```html
<!-- Hidden on mobile, visible on tablet+ -->
<div class="d-none d-md-block">Tablet and up</div>

<!-- Visible on mobile only -->
<div class="d-block d-md-none">Mobile only</div>

<!-- Different margins per screen size -->
<div class="mt-2 mt-md-4 mt-lg-5">Responsive margin</div>
```

---

## Quick Reference Card

```
TEXT:      text-center | text-left | text-right
DISPLAY:   d-none | d-block | d-flex | d-inline
FLEX:      justify-content-center | align-items-center
MARGIN:    m-3 | mt-2 | mb-4 | mx-auto | my-3
PADDING:   p-3 | pt-2 | pb-4 | px-3 | py-2
WIDTH:     w-25 | w-50 | w-75 | w-100
COLOR:     text-primary | text-danger | text-muted
BG:        bg-primary | bg-danger | bg-light
BORDER:    border | border-0 | rounded | rounded-circle
FONT:      font-weight-bold | font-italic | text-uppercase
```
