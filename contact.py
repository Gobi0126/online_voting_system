import tkinter as tk
from tkinter import messagebox

class ContactPage(tk.Tk):
    def __init__(self):
        super().__init__()
        self.title("Contact Page")
        self.geometry("400x300")

        self.create_widgets()

    def create_widgets(self):
        # Name Entry
        self.name_label = tk.Label(self, text="Name:")
        self.name_label.pack(pady=5)
        self.name_entry = tk.Entry(self)
        self.name_entry.pack(pady=5)

        # Email Entry
        self.email_label = tk.Label(self, text="Email:")
        self.email_label.pack(pady=5)
        self.email_entry = tk.Entry(self)
        self.email_entry.pack(pady=5)

        # Message Entry
        self.message_label = tk.Label(self, text="Message:")
        self.message_label.pack(pady=5)
        self.message_entry = tk.Text(self, height=5, wrap=tk.WORD)
        self.message_entry.pack(pady=5)

        # Submit Button
        self.submit_button = tk.Button(self, text="Submit", command=self.submit_form)
        self.submit_button.pack(pady=10)

    def submit_form(self):
        # Get user inputs
        name = self.name_entry.get()
        email = self.email_entry.get()
        message = self.message_entry.get("1.0", tk.END)

        # Display a message box with the entered information
        messagebox.showinfo("Submitted", f"Name: {name}\nEmail: {email}\nMessage:\n{message}")

if __name__ == "__main__":
    app = ContactPage()
    app.mainloop()
