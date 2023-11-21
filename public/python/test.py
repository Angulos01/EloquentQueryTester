import sys
import csv

# Get command-line arguments
selected_requests = sys.argv[1:]
selected_complements = sys.argv[2:]

# Concatenate selected data
data = selected_requests + selected_complements

# Write the data to a CSV file
with open('output.csv', 'w', newline='') as csvfile:
    csvwriter = csv.writer(csvfile)
    csvwriter.writerow(data)
