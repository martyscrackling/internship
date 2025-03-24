def switch_example(value):
    match value:
        case 1:
            return "USA"
        case 2:
            return "Spain"
        case 3:
            return "Philippines"
        case _:
            return "Invalid choice"

value = int(input("please input: "))
print(switch_example(value))
