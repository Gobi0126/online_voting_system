import tkinter as tk
from tkinter import messagebox

class AboutPage(tk.Toplevel):
    def __init__(self, parent):
        super().__init__(parent)
        self.title("About Online Voting System")
        self.geometry("400x300")

        self.create_widgets()

    def create_widgets(self):
        info_label = tk.Label(self, text="Online Voting System\n\nDeveloped by:\nGobi and Zeros_and_Ones\n\nCopyright © 2023")
        info_label.pack(pady=20)
        close_button = tk.Button(self, text="Close", command=self.destroy)
        close_button.pack()

if __name__ == "__main__":
    root = tk.Tk()
    root.title("Online Voting System")
    about_button = tk.Button(root, text="About", command=lambda: AboutPage(root))
    about_button.pack(pady=20)
    root.mainloop()
